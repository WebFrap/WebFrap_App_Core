<?php 

      if( !$data = $orm->getByKey( 'CoreCountry', 'af' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'af';
      }
    $data->upgrade( 'name', 'Afghanistan' );
    $data->upgrade( 'key3', 'AFG' );
    $data->upgrade( 'country_number', '004' );
    $data->upgrade( 'flag', 'af' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'af',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: af'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'af',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: af'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: af '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'al' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'al';
      }
    $data->upgrade( 'name', 'Albania' );
    $data->upgrade( 'key3', 'ALB' );
    $data->upgrade( 'country_number', '008' );
    $data->upgrade( 'flag', 'al' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'al',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: al'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'al',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: al'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: al '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'dz' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'dz';
      }
    $data->upgrade( 'name', 'Algeria' );
    $data->upgrade( 'key3', 'DZA' );
    $data->upgrade( 'country_number', '012' );
    $data->upgrade( 'flag', 'dz' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'dz',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: dz'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'dz',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: dz'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: dz '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'as' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'as';
      }
    $data->upgrade( 'name', 'American Samoa' );
    $data->upgrade( 'key3', 'ASM' );
    $data->upgrade( 'country_number', '016' );
    $data->upgrade( 'flag', 'as' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'as',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: as'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'as',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: as'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: as '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'ad' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'ad';
      }
    $data->upgrade( 'name', 'Andorra' );
    $data->upgrade( 'key3', 'AND' );
    $data->upgrade( 'country_number', '020' );
    $data->upgrade( 'flag', 'ad' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'ad',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: ad'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'ad',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: ad'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: ad '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'ao' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'ao';
      }
    $data->upgrade( 'name', 'Angola' );
    $data->upgrade( 'key3', 'AGO' );
    $data->upgrade( 'country_number', '024' );
    $data->upgrade( 'flag', 'ao' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'ao',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: ao'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'ao',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: ao'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: ao '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'ai' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'ai';
      }
    $data->upgrade( 'name', 'Anguilla' );
    $data->upgrade( 'key3', 'AIA' );
    $data->upgrade( 'country_number', '660' );
    $data->upgrade( 'flag', 'ai' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'ai',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: ai'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'ai',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: ai'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: ai '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'aq' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'aq';
      }
    $data->upgrade( 'name', 'Antarctica' );
    $data->upgrade( 'key3', 'ATA' );
    $data->upgrade( 'country_number', '010' );
    $data->upgrade( 'flag', 'aq' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'aq',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: aq'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'aq',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: aq'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: aq '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'ag' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'ag';
      }
    $data->upgrade( 'name', 'Antigua & Barbuda' );
    $data->upgrade( 'key3', 'ATG' );
    $data->upgrade( 'country_number', '028' );
    $data->upgrade( 'flag', '' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'ag',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: ag'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'ag',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: ag'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: ag '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'ar' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'ar';
      }
    $data->upgrade( 'name', 'Argentina' );
    $data->upgrade( 'key3', 'ARG' );
    $data->upgrade( 'country_number', '032' );
    $data->upgrade( 'flag', 'ar' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'ar',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: ar'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'ar',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: ar'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: ar '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'am' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'am';
      }
    $data->upgrade( 'name', 'Armenia' );
    $data->upgrade( 'key3', 'ARM' );
    $data->upgrade( 'country_number', '051' );
    $data->upgrade( 'flag', 'am' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'am',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: am'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'am',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: am'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: am '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'aw' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'aw';
      }
    $data->upgrade( 'name', 'Aruba' );
    $data->upgrade( 'key3', 'ABW' );
    $data->upgrade( 'country_number', '533' );
    $data->upgrade( 'flag', 'aw' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'aw',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: aw'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'aw',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: aw'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: aw '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'au' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'au';
      }
    $data->upgrade( 'name', 'Australia' );
    $data->upgrade( 'key3', 'AUS' );
    $data->upgrade( 'country_number', '036' );
    $data->upgrade( 'flag', 'au' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'au',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: au'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'au',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: au'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: au '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'at' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'at';
      }
    $data->upgrade( 'name', 'Austria' );
    $data->upgrade( 'key3', 'AUT' );
    $data->upgrade( 'country_number', '040' );
    $data->upgrade( 'flag', 'at' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'at',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: at'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'at',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: at'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: at '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'az' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'az';
      }
    $data->upgrade( 'name', 'Azerbaijan' );
    $data->upgrade( 'key3', 'AZE' );
    $data->upgrade( 'country_number', '031' );
    $data->upgrade( 'flag', 'az' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'az',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: az'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'az',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: az'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: az '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'bs' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'bs';
      }
    $data->upgrade( 'name', 'Bahamas' );
    $data->upgrade( 'key3', 'BHS' );
    $data->upgrade( 'country_number', '044' );
    $data->upgrade( 'flag', 'bs' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'bs',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: bs'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'bs',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: bs'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: bs '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'bh' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'bh';
      }
    $data->upgrade( 'name', 'Bahrain' );
    $data->upgrade( 'key3', 'BHR' );
    $data->upgrade( 'country_number', '048' );
    $data->upgrade( 'flag', 'bh' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'bh',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: bh'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'bh',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: bh'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: bh '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'bd' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'bd';
      }
    $data->upgrade( 'name', 'Bangladesh' );
    $data->upgrade( 'key3', 'BGD' );
    $data->upgrade( 'country_number', '050' );
    $data->upgrade( 'flag', 'bd' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'bd',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: bd'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'bd',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: bd'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: bd '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'bb' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'bb';
      }
    $data->upgrade( 'name', 'Barbados' );
    $data->upgrade( 'key3', 'BRB' );
    $data->upgrade( 'country_number', '052' );
    $data->upgrade( 'flag', 'bb' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'bb',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: bb'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'bb',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: bb'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: bb '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'by' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'by';
      }
    $data->upgrade( 'name', 'Belarus' );
    $data->upgrade( 'key3', 'BLR' );
    $data->upgrade( 'country_number', '112' );
    $data->upgrade( 'flag', 'by' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'by',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: by'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'by',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: by'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: by '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'be' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'be';
      }
    $data->upgrade( 'name', 'Belgium' );
    $data->upgrade( 'key3', 'BEL' );
    $data->upgrade( 'country_number', '056' );
    $data->upgrade( 'flag', 'be' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'be',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: be'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'be',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: be'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: be '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'bz' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'bz';
      }
    $data->upgrade( 'name', 'Belize' );
    $data->upgrade( 'key3', 'BLZ' );
    $data->upgrade( 'country_number', '084' );
    $data->upgrade( 'flag', 'bz' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'bz',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: bz'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'bz',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: bz'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: bz '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'bj' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'bj';
      }
    $data->upgrade( 'name', 'Benin' );
    $data->upgrade( 'key3', 'BEN' );
    $data->upgrade( 'country_number', '204' );
    $data->upgrade( 'flag', 'bj' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'bj',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: bj'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'bj',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: bj'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: bj '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'bm' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'bm';
      }
    $data->upgrade( 'name', 'Bermuda' );
    $data->upgrade( 'key3', 'BMU' );
    $data->upgrade( 'country_number', '060' );
    $data->upgrade( 'flag', 'bm' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'bm',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: bm'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'bm',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: bm'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: bm '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'bt' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'bt';
      }
    $data->upgrade( 'name', 'Bhutan' );
    $data->upgrade( 'key3', 'BTN' );
    $data->upgrade( 'country_number', '064' );
    $data->upgrade( 'flag', 'bt' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'bt',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: bt'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'bt',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: bt'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: bt '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'bo' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'bo';
      }
    $data->upgrade( 'name', 'Bolivia' );
    $data->upgrade( 'key3', 'BOL' );
    $data->upgrade( 'country_number', '068' );
    $data->upgrade( 'flag', 'bo' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'bo',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: bo'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'bo',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: bo'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: bo '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'ba' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'ba';
      }
    $data->upgrade( 'name', 'Bosnia and Herzegowina' );
    $data->upgrade( 'key3', 'BHI' );
    $data->upgrade( 'country_number', '070' );
    $data->upgrade( 'flag', 'ba' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'ba',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: ba'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'ba',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: ba'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: ba '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'bw' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'bw';
      }
    $data->upgrade( 'name', 'Botswana' );
    $data->upgrade( 'key3', 'BWA' );
    $data->upgrade( 'country_number', '072' );
    $data->upgrade( 'flag', 'bw' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'bw',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: bw'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'bw',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: bw'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: bw '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'bv' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'bv';
      }
    $data->upgrade( 'name', 'Bouvet Island' );
    $data->upgrade( 'key3', 'BVT' );
    $data->upgrade( 'country_number', '074' );
    $data->upgrade( 'flag', 'bv' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'bv',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: bv'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'bv',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: bv'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: bv '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'br' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'br';
      }
    $data->upgrade( 'name', 'Brazil' );
    $data->upgrade( 'key3', 'BRA' );
    $data->upgrade( 'country_number', '076' );
    $data->upgrade( 'flag', 'br' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'br',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: br'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'br',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: br'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: br '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'io' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'io';
      }
    $data->upgrade( 'name', 'British Indian Ocean Territory' );
    $data->upgrade( 'key3', 'IOT' );
    $data->upgrade( 'country_number', '068' );
    $data->upgrade( 'flag', 'io' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'io',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: io'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'io',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: io'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: io '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'bn' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'bn';
      }
    $data->upgrade( 'name', 'Brunei Darussalam' );
    $data->upgrade( 'key3', 'BRN' );
    $data->upgrade( 'country_number', '096' );
    $data->upgrade( 'flag', 'bn' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'bn',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: bn'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'bn',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: bn'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: bn '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'bg' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'bg';
      }
    $data->upgrade( 'name', 'Bulgaria' );
    $data->upgrade( 'key3', 'BGR' );
    $data->upgrade( 'country_number', '100' );
    $data->upgrade( 'flag', 'bg' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'bg',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: bg'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'bg',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: bg'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: bg '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'bf' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'bf';
      }
    $data->upgrade( 'name', 'Burkina Faso' );
    $data->upgrade( 'key3', 'BFA' );
    $data->upgrade( 'country_number', '854' );
    $data->upgrade( 'flag', 'bf' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'bf',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: bf'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'bf',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: bf'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: bf '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'bi' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'bi';
      }
    $data->upgrade( 'name', 'Birundi' );
    $data->upgrade( 'key3', 'BDI' );
    $data->upgrade( 'country_number', '108' );
    $data->upgrade( 'flag', 'bi' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'bi',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: bi'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'bi',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: bi'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: bi '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'kh' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'kh';
      }
    $data->upgrade( 'name', 'Kambodia' );
    $data->upgrade( 'key3', 'KHM' );
    $data->upgrade( 'country_number', '116' );
    $data->upgrade( 'flag', 'kh' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'kh',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: kh'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'kh',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: kh'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: kh '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'cm' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'cm';
      }
    $data->upgrade( 'name', 'Cameroon' );
    $data->upgrade( 'key3', 'CMR' );
    $data->upgrade( 'country_number', '120' );
    $data->upgrade( 'flag', 'cm' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'cm',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: cm'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'cm',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: cm'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: cm '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'ca' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'ca';
      }
    $data->upgrade( 'name', 'Canada' );
    $data->upgrade( 'key3', 'CAN' );
    $data->upgrade( 'country_number', '124' );
    $data->upgrade( 'flag', 'ca' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'ca',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: ca'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'ca',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: ca'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: ca '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'cv' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'cv';
      }
    $data->upgrade( 'name', 'Cape Verde' );
    $data->upgrade( 'key3', 'CPV' );
    $data->upgrade( 'country_number', '132' );
    $data->upgrade( 'flag', 'cv' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'cv',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: cv'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'cv',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: cv'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: cv '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'ky' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'ky';
      }
    $data->upgrade( 'name', 'Cayman Islands' );
    $data->upgrade( 'key3', 'CYM' );
    $data->upgrade( 'country_number', '136' );
    $data->upgrade( 'flag', 'ky' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'ky',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: ky'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'ky',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: ky'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: ky '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'cf' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'cf';
      }
    $data->upgrade( 'name', 'Central African Republic' );
    $data->upgrade( 'key3', 'CAF' );
    $data->upgrade( 'country_number', '140' );
    $data->upgrade( 'flag', 'cf' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'cf',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: cf'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'cf',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: cf'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: cf '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'td' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'td';
      }
    $data->upgrade( 'name', 'Chad' );
    $data->upgrade( 'key3', 'TCD' );
    $data->upgrade( 'country_number', '148' );
    $data->upgrade( 'flag', 'td' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'td',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: td'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'td',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: td'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: td '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'cl' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'cl';
      }
    $data->upgrade( 'name', 'Chile' );
    $data->upgrade( 'key3', 'CHL' );
    $data->upgrade( 'country_number', '152' );
    $data->upgrade( 'flag', 'cl' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'cl',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: cl'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'cl',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: cl'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: cl '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'cn' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'cn';
      }
    $data->upgrade( 'name', 'China' );
    $data->upgrade( 'key3', 'CHN' );
    $data->upgrade( 'country_number', '156' );
    $data->upgrade( 'flag', 'cn' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'cn',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: cn'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'cn',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: cn'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: cn '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'cx' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'cx';
      }
    $data->upgrade( 'name', 'Christmas Island' );
    $data->upgrade( 'key3', 'CXR' );
    $data->upgrade( 'country_number', '162' );
    $data->upgrade( 'flag', 'cx' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'cx',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: cx'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'cx',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: cx'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: cx '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'cc' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'cc';
      }
    $data->upgrade( 'name', 'Cocos (Keeling) Islands' );
    $data->upgrade( 'key3', 'CCK' );
    $data->upgrade( 'country_number', '166' );
    $data->upgrade( 'flag', 'cc' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'cc',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: cc'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'cc',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: cc'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: cc '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'co' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'co';
      }
    $data->upgrade( 'name', 'Colombia' );
    $data->upgrade( 'key3', 'COL' );
    $data->upgrade( 'country_number', '170' );
    $data->upgrade( 'flag', 'co' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'co',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: co'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'co',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: co'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: co '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'km' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'km';
      }
    $data->upgrade( 'name', 'Comoros' );
    $data->upgrade( 'key3', 'COM' );
    $data->upgrade( 'country_number', '174' );
    $data->upgrade( 'flag', 'km' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'km',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: km'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'km',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: km'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: km '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'cg' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'cg';
      }
    $data->upgrade( 'name', 'Congo' );
    $data->upgrade( 'key3', 'COG' );
    $data->upgrade( 'country_number', '178' );
    $data->upgrade( 'flag', 'cg' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'cg',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: cg'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'cg',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: cg'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: cg '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'cd' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'cd';
      }
    $data->upgrade( 'name', 'Cong, The DRC' );
    $data->upgrade( 'key3', 'COD' );
    $data->upgrade( 'country_number', '180' );
    $data->upgrade( 'flag', 'cd' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'cd',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: cd'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'cd',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: cd'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: cd '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'ck' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'ck';
      }
    $data->upgrade( 'name', 'Cook Islands' );
    $data->upgrade( 'key3', 'COK' );
    $data->upgrade( 'country_number', '184' );
    $data->upgrade( 'flag', 'ck' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'ck',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: ck'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'ck',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: ck'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: ck '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'cr' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'cr';
      }
    $data->upgrade( 'name', 'Costa Rica' );
    $data->upgrade( 'key3', 'CRI' );
    $data->upgrade( 'country_number', '188' );
    $data->upgrade( 'flag', 'cr' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'cr',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: cr'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'cr',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: cr'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: cr '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'ci' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'ci';
      }
    $data->upgrade( 'name', 'Cote D`Ivoire' );
    $data->upgrade( 'key3', 'CIV' );
    $data->upgrade( 'country_number', '384' );
    $data->upgrade( 'flag', 'ci' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'ci',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: ci'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'ci',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: ci'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: ci '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'hr' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'hr';
      }
    $data->upgrade( 'name', 'Croatia' );
    $data->upgrade( 'key3', 'HRV' );
    $data->upgrade( 'country_number', '191' );
    $data->upgrade( 'flag', 'hr' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'hr',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: hr'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'hr',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: hr'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: hr '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'cu' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'cu';
      }
    $data->upgrade( 'name', 'Cuba' );
    $data->upgrade( 'key3', 'CUB' );
    $data->upgrade( 'country_number', '192' );
    $data->upgrade( 'flag', 'cu' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'cu',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: cu'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'cu',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: cu'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: cu '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'cy' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'cy';
      }
    $data->upgrade( 'name', 'Cyprus' );
    $data->upgrade( 'key3', 'CYP' );
    $data->upgrade( 'country_number', '196' );
    $data->upgrade( 'flag', 'cy' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'cy',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: cy'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'cy',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: cy'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: cy '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'cz' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'cz';
      }
    $data->upgrade( 'name', 'Czech Republic' );
    $data->upgrade( 'key3', 'CZE' );
    $data->upgrade( 'country_number', '203' );
    $data->upgrade( 'flag', 'cz' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'cz',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: cz'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'cz',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: cz'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: cz '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'dk' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'dk';
      }
    $data->upgrade( 'name', 'Denmark' );
    $data->upgrade( 'key3', 'DNK' );
    $data->upgrade( 'country_number', '208' );
    $data->upgrade( 'flag', 'dk' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'dk',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: dk'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'dk',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: dk'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: dk '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'dj' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'dj';
      }
    $data->upgrade( 'name', 'Djibouti' );
    $data->upgrade( 'key3', 'DJI' );
    $data->upgrade( 'country_number', '262' );
    $data->upgrade( 'flag', 'dj' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'dj',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: dj'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'dj',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: dj'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: dj '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'dm' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'dm';
      }
    $data->upgrade( 'name', 'Dominica' );
    $data->upgrade( 'key3', 'DMA' );
    $data->upgrade( 'country_number', '212' );
    $data->upgrade( 'flag', 'dm' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'dm',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: dm'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'dm',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: dm'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: dm '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'do' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'do';
      }
    $data->upgrade( 'name', 'Dominican Republic' );
    $data->upgrade( 'key3', 'DOM' );
    $data->upgrade( 'country_number', '214' );
    $data->upgrade( 'flag', 'do' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'do',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: do'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'do',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: do'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: do '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'tp' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'tp';
      }
    $data->upgrade( 'name', 'East Timor' );
    $data->upgrade( 'key3', 'TMP' );
    $data->upgrade( 'country_number', '626' );
    $data->upgrade( 'flag', 'tp' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'tp',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: tp'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'tp',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: tp'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: tp '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'bc' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'bc';
      }
    $data->upgrade( 'name', 'Ecuador' );
    $data->upgrade( 'key3', 'ECU' );
    $data->upgrade( 'country_number', '218' );
    $data->upgrade( 'flag', 'bc' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'bc',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: bc'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'bc',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: bc'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: bc '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'eg' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'eg';
      }
    $data->upgrade( 'name', 'Egypt' );
    $data->upgrade( 'key3', 'EGY' );
    $data->upgrade( 'country_number', '818' );
    $data->upgrade( 'flag', 'eg' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'eg',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: eg'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'eg',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: eg'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: eg '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'sv' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'sv';
      }
    $data->upgrade( 'name', 'El Salvador' );
    $data->upgrade( 'key3', 'SLV' );
    $data->upgrade( 'country_number', '222' );
    $data->upgrade( 'flag', 'sv' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'sv',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: sv'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'sv',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: sv'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: sv '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'gq' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'gq';
      }
    $data->upgrade( 'name', 'Equatorial Guinea' );
    $data->upgrade( 'key3', 'GNQ' );
    $data->upgrade( 'country_number', '226' );
    $data->upgrade( 'flag', 'gq' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'gq',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: gq'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'gq',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: gq'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: gq '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'er' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'er';
      }
    $data->upgrade( 'name', 'Eritrea' );
    $data->upgrade( 'key3', 'ERI' );
    $data->upgrade( 'country_number', '232' );
    $data->upgrade( 'flag', 'er' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'er',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: er'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'er',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: er'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: er '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'ee' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'ee';
      }
    $data->upgrade( 'name', 'Estonia' );
    $data->upgrade( 'key3', 'EST' );
    $data->upgrade( 'country_number', '233' );
    $data->upgrade( 'flag', 'ee' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'ee',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: ee'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'ee',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: ee'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: ee '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'et' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'et';
      }
    $data->upgrade( 'name', 'Ethiopia' );
    $data->upgrade( 'key3', 'ETH' );
    $data->upgrade( 'country_number', '231' );
    $data->upgrade( 'flag', 'et' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'et',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: et'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'et',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: et'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: et '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'fk' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'fk';
      }
    $data->upgrade( 'name', 'Falkland Islands' );
    $data->upgrade( 'key3', 'FLK' );
    $data->upgrade( 'country_number', '238' );
    $data->upgrade( 'flag', 'fk' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'fk',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: fk'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'fk',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: fk'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: fk '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'fo' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'fo';
      }
    $data->upgrade( 'name', 'Faroe Islands' );
    $data->upgrade( 'key3', 'FRO' );
    $data->upgrade( 'country_number', '234' );
    $data->upgrade( 'flag', 'fo' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'fo',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: fo'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'fo',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: fo'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: fo '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'fj' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'fj';
      }
    $data->upgrade( 'name', 'Fiji' );
    $data->upgrade( 'key3', 'FJI' );
    $data->upgrade( 'country_number', '242' );
    $data->upgrade( 'flag', 'fj' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'fj',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: fj'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'fj',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: fj'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: fj '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'fi' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'fi';
      }
    $data->upgrade( 'name', 'Finland' );
    $data->upgrade( 'key3', 'FIN' );
    $data->upgrade( 'country_number', '246' );
    $data->upgrade( 'flag', 'fi' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'fi',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: fi'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'fi',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: fi'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: fi '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'fr' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'fr';
      }
    $data->upgrade( 'name', 'France' );
    $data->upgrade( 'key3', 'FRA' );
    $data->upgrade( 'country_number', '250' );
    $data->upgrade( 'flag', 'fr' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'fr',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: fr'
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
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: fr'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: fr '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'fx' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'fx';
      }
    $data->upgrade( 'name', 'France, Metropolitan' );
    $data->upgrade( 'key3', 'FXX' );
    $data->upgrade( 'country_number', '249' );
    $data->upgrade( 'flag', 'fx' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'fx',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: fx'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'fx',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: fx'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: fx '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'gf' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'gf';
      }
    $data->upgrade( 'name', 'French Guiana' );
    $data->upgrade( 'key3', 'GUF' );
    $data->upgrade( 'country_number', '254' );
    $data->upgrade( 'flag', 'gf' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'gf',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: gf'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'gf',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: gf'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: gf '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'pf' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'pf';
      }
    $data->upgrade( 'name', 'French Polynesia' );
    $data->upgrade( 'key3', 'PYF' );
    $data->upgrade( 'country_number', '258' );
    $data->upgrade( 'flag', 'pf' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'pf',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: pf'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'pf',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: pf'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: pf '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'tf' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'tf';
      }
    $data->upgrade( 'name', 'French Southern Territories' );
    $data->upgrade( 'key3', 'ATF' );
    $data->upgrade( 'country_number', '260' );
    $data->upgrade( 'flag', 'tf' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'tf',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: tf'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'tf',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: tf'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: tf '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'ga' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'ga';
      }
    $data->upgrade( 'name', 'Gabon' );
    $data->upgrade( 'key3', 'GAB' );
    $data->upgrade( 'country_number', '266' );
    $data->upgrade( 'flag', 'ga' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'ga',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: ga'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'ga',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: ga'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: ga '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'gm' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'gm';
      }
    $data->upgrade( 'name', 'Gambia' );
    $data->upgrade( 'key3', 'GMB' );
    $data->upgrade( 'country_number', '270' );
    $data->upgrade( 'flag', 'gm' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'gm',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: gm'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'gm',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: gm'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: gm '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'ge' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'ge';
      }
    $data->upgrade( 'name', 'Georgia' );
    $data->upgrade( 'key3', 'GEO' );
    $data->upgrade( 'country_number', '268' );
    $data->upgrade( 'flag', 'ge' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'ge',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: ge'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'ge',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: ge'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: ge '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'de' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'de';
      }
    $data->upgrade( 'name', 'Germany' );
    $data->upgrade( 'key3', 'DEU' );
    $data->upgrade( 'country_number', '276' );
    $data->upgrade( 'flag', 'de' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'de',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: de'
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
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: de'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: de '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'gh' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'gh';
      }
    $data->upgrade( 'name', 'Ghana' );
    $data->upgrade( 'key3', 'GHA' );
    $data->upgrade( 'country_number', '288' );
    $data->upgrade( 'flag', 'gh' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'gh',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: gh'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'gh',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: gh'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: gh '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'gi' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'gi';
      }
    $data->upgrade( 'name', 'Gibraltar' );
    $data->upgrade( 'key3', 'GIB' );
    $data->upgrade( 'country_number', '292' );
    $data->upgrade( 'flag', 'gi' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'gi',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: gi'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'gi',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: gi'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: gi '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'gr' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'gr';
      }
    $data->upgrade( 'name', 'Greece' );
    $data->upgrade( 'key3', 'GRC' );
    $data->upgrade( 'country_number', '300' );
    $data->upgrade( 'flag', 'gr' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'gr',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: gr'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'gr',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: gr'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: gr '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'gl' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'gl';
      }
    $data->upgrade( 'name', 'Greenland' );
    $data->upgrade( 'key3', 'GRL' );
    $data->upgrade( 'country_number', '304' );
    $data->upgrade( 'flag', 'gl' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'gl',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: gl'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'gl',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: gl'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: gl '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'gd' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'gd';
      }
    $data->upgrade( 'name', 'Grenada' );
    $data->upgrade( 'key3', 'GRD' );
    $data->upgrade( 'country_number', '308' );
    $data->upgrade( 'flag', 'gd' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'gd',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: gd'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'gd',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: gd'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: gd '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'gp' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'gp';
      }
    $data->upgrade( 'name', 'Guadeloupe' );
    $data->upgrade( 'key3', 'GLP' );
    $data->upgrade( 'country_number', '312' );
    $data->upgrade( 'flag', 'gp' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'gp',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: gp'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'gp',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: gp'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: gp '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'gu' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'gu';
      }
    $data->upgrade( 'name', 'Guam' );
    $data->upgrade( 'key3', 'GUM' );
    $data->upgrade( 'country_number', '316' );
    $data->upgrade( 'flag', 'gu' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'gu',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: gu'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'gu',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: gu'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: gu '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'gt' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'gt';
      }
    $data->upgrade( 'name', 'Guatemala' );
    $data->upgrade( 'key3', 'GTM' );
    $data->upgrade( 'country_number', '320' );
    $data->upgrade( 'flag', 'gt' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'gt',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: gt'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'gt',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: gt'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: gt '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'gn' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'gn';
      }
    $data->upgrade( 'name', 'Guinea' );
    $data->upgrade( 'key3', 'GIN' );
    $data->upgrade( 'country_number', '324' );
    $data->upgrade( 'flag', 'gn' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'gn',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: gn'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'gn',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: gn'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: gn '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'gw' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'gw';
      }
    $data->upgrade( 'name', 'Guinea-Bissau' );
    $data->upgrade( 'key3', 'GNB' );
    $data->upgrade( 'country_number', '624' );
    $data->upgrade( 'flag', 'gw' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'gw',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: gw'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'gw',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: gw'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: gw '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'gy' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'gy';
      }
    $data->upgrade( 'name', 'Guyana' );
    $data->upgrade( 'key3', 'GUY' );
    $data->upgrade( 'country_number', '328' );
    $data->upgrade( 'flag', 'gy' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'gy',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: gy'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'gy',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: gy'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: gy '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'ht' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'ht';
      }
    $data->upgrade( 'name', 'Haiti' );
    $data->upgrade( 'key3', 'HTI' );
    $data->upgrade( 'country_number', '332' );
    $data->upgrade( 'flag', 'ht' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'ht',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: ht'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'ht',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: ht'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: ht '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'hm' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'hm';
      }
    $data->upgrade( 'name', 'Heard and MC Donald Islands' );
    $data->upgrade( 'key3', '' );
    $data->upgrade( 'country_number', '' );
    $data->upgrade( 'flag', '' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'hm',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: hm'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'hm',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: hm'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: hm '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'va' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'va';
      }
    $data->upgrade( 'name', 'Holy See (Vatican City State)' );
    $data->upgrade( 'key3', 'VAT' );
    $data->upgrade( 'country_number', '336' );
    $data->upgrade( 'flag', 'va' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'va',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: va'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'va',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: va'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: va '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'hn' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'hn';
      }
    $data->upgrade( 'name', 'Honduras' );
    $data->upgrade( 'key3', 'HND' );
    $data->upgrade( 'country_number', '340' );
    $data->upgrade( 'flag', 'hn' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'hn',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: hn'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'hn',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: hn'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: hn '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'hk' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'hk';
      }
    $data->upgrade( 'name', 'Hong Kong' );
    $data->upgrade( 'key3', 'HKG' );
    $data->upgrade( 'country_number', '344' );
    $data->upgrade( 'flag', 'hk' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'hk',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: hk'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'hk',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: hk'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: hk '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'hu' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'hu';
      }
    $data->upgrade( 'name', 'Hungary' );
    $data->upgrade( 'key3', 'HUN' );
    $data->upgrade( 'country_number', '348' );
    $data->upgrade( 'flag', 'hu' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'hu',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: hu'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'hu',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: hu'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: hu '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'is' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'is';
      }
    $data->upgrade( 'name', 'Iceland' );
    $data->upgrade( 'key3', 'ISL' );
    $data->upgrade( 'country_number', '352' );
    $data->upgrade( 'flag', 'is' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'is',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: is'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'is',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: is'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: is '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'in' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'in';
      }
    $data->upgrade( 'name', 'India' );
    $data->upgrade( 'key3', 'IND' );
    $data->upgrade( 'country_number', '356' );
    $data->upgrade( 'flag', 'in' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'in',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: in'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'in',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: in'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: in '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'id' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'id';
      }
    $data->upgrade( 'name', 'Indonesia' );
    $data->upgrade( 'key3', 'IDN' );
    $data->upgrade( 'country_number', '360' );
    $data->upgrade( 'flag', 'id' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'id',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: id'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'id',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: id'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: id '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'ir' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'ir';
      }
    $data->upgrade( 'name', 'Iran' );
    $data->upgrade( 'key3', 'IRN' );
    $data->upgrade( 'country_number', '364' );
    $data->upgrade( 'flag', 'ir' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'ir',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: ir'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'ir',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: ir'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: ir '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'iq' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'iq';
      }
    $data->upgrade( 'name', 'Iraq' );
    $data->upgrade( 'key3', 'IRQ' );
    $data->upgrade( 'country_number', '368' );
    $data->upgrade( 'flag', 'iq' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'iq',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: iq'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'iq',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: iq'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: iq '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'ie' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'ie';
      }
    $data->upgrade( 'name', 'Ireland' );
    $data->upgrade( 'key3', 'IRL' );
    $data->upgrade( 'country_number', '372' );
    $data->upgrade( 'flag', 'ie' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'ie',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: ie'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'ie',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: ie'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: ie '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'il' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'il';
      }
    $data->upgrade( 'name', 'Israel' );
    $data->upgrade( 'key3', 'ISR' );
    $data->upgrade( 'country_number', '376' );
    $data->upgrade( 'flag', 'il' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'il',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: il'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'il',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: il'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: il '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'it' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'it';
      }
    $data->upgrade( 'name', 'Italy' );
    $data->upgrade( 'key3', 'ITA' );
    $data->upgrade( 'country_number', '380' );
    $data->upgrade( 'flag', 'it' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'it',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: it'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'it',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: it'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: it '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'jm' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'jm';
      }
    $data->upgrade( 'name', 'Jamaica' );
    $data->upgrade( 'key3', 'JAM' );
    $data->upgrade( 'country_number', '388' );
    $data->upgrade( 'flag', 'jm' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'jm',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: jm'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'jm',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: jm'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: jm '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'jp' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'jp';
      }
    $data->upgrade( 'name', 'Japan' );
    $data->upgrade( 'key3', 'JPN' );
    $data->upgrade( 'country_number', '392' );
    $data->upgrade( 'flag', 'jp' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'jp',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: jp'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'jp',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: jp'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: jp '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'jo' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'jo';
      }
    $data->upgrade( 'name', 'Jordan' );
    $data->upgrade( 'key3', 'JOR' );
    $data->upgrade( 'country_number', '400' );
    $data->upgrade( 'flag', 'jo' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'jo',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: jo'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'jo',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: jo'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: jo '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'kz' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'kz';
      }
    $data->upgrade( 'name', 'Kazakhstan' );
    $data->upgrade( 'key3', 'KAZ' );
    $data->upgrade( 'country_number', '398' );
    $data->upgrade( 'flag', 'kz' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'kz',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: kz'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'kz',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: kz'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: kz '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'ke' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'ke';
      }
    $data->upgrade( 'name', 'Kenya' );
    $data->upgrade( 'key3', 'KEN' );
    $data->upgrade( 'country_number', '404' );
    $data->upgrade( 'flag', 'ke' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'ke',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: ke'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'ke',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: ke'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: ke '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'ki' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'ki';
      }
    $data->upgrade( 'name', 'Kiribati' );
    $data->upgrade( 'key3', 'KIR' );
    $data->upgrade( 'country_number', '296' );
    $data->upgrade( 'flag', 'ki' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'ki',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: ki'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'ki',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: ki'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: ki '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'kp' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'kp';
      }
    $data->upgrade( 'name', 'Korea, D.P.R.O.' );
    $data->upgrade( 'key3', 'PRK' );
    $data->upgrade( 'country_number', '408' );
    $data->upgrade( 'flag', 'kp' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'kp',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: kp'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'kp',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: kp'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: kp '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'kr' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'kr';
      }
    $data->upgrade( 'name', 'Korea, Republic of' );
    $data->upgrade( 'key3', 'KOR' );
    $data->upgrade( 'country_number', '410' );
    $data->upgrade( 'flag', 'kr' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'kr',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: kr'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'kr',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: kr'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: kr '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'kw' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'kw';
      }
    $data->upgrade( 'name', 'Kuwait' );
    $data->upgrade( 'key3', 'KWT' );
    $data->upgrade( 'country_number', '414' );
    $data->upgrade( 'flag', 'kw' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'kw',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: kw'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'kw',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: kw'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: kw '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'kg' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'kg';
      }
    $data->upgrade( 'name', 'Kyrgyzstan' );
    $data->upgrade( 'key3', 'KGZ' );
    $data->upgrade( 'country_number', '417' );
    $data->upgrade( 'flag', 'kg' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'kg',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: kg'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'kg',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: kg'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: kg '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'la' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'la';
      }
    $data->upgrade( 'name', 'Laos' );
    $data->upgrade( 'key3', 'LAO' );
    $data->upgrade( 'country_number', '418' );
    $data->upgrade( 'flag', 'la' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'la',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: la'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'la',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: la'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: la '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'lv' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'lv';
      }
    $data->upgrade( 'name', 'Latvia' );
    $data->upgrade( 'key3', 'LVA' );
    $data->upgrade( 'country_number', '428' );
    $data->upgrade( 'flag', 'lv' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'lv',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: lv'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'lv',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: lv'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: lv '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'lb' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'lb';
      }
    $data->upgrade( 'name', 'Lebanon' );
    $data->upgrade( 'key3', 'LBN' );
    $data->upgrade( 'country_number', '422' );
    $data->upgrade( 'flag', 'lb' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'lb',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: lb'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'lb',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: lb'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: lb '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'ls' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'ls';
      }
    $data->upgrade( 'name', 'Lesotho' );
    $data->upgrade( 'key3', 'LSO' );
    $data->upgrade( 'country_number', '426' );
    $data->upgrade( 'flag', 'ls' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'ls',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: ls'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'ls',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: ls'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: ls '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'lr' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'lr';
      }
    $data->upgrade( 'name', 'Liberia' );
    $data->upgrade( 'key3', 'LBR' );
    $data->upgrade( 'country_number', '430' );
    $data->upgrade( 'flag', 'lr' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'lr',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: lr'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'lr',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: lr'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: lr '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'ly' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'ly';
      }
    $data->upgrade( 'name', 'Libyan Arab Jamahiriya' );
    $data->upgrade( 'key3', 'LBY' );
    $data->upgrade( 'country_number', '434' );
    $data->upgrade( 'flag', 'ly' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'ly',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: ly'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'ly',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: ly'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: ly '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'li' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'li';
      }
    $data->upgrade( 'name', 'Liechtenstein' );
    $data->upgrade( 'key3', 'LIE' );
    $data->upgrade( 'country_number', '438' );
    $data->upgrade( 'flag', 'li' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'li',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: li'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'li',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: li'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: li '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'lt' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'lt';
      }
    $data->upgrade( 'name', 'Lithuania' );
    $data->upgrade( 'key3', 'LTU' );
    $data->upgrade( 'country_number', '440' );
    $data->upgrade( 'flag', 'lt' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'lt',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: lt'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'lt',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: lt'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: lt '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'lu' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'lu';
      }
    $data->upgrade( 'name', 'Louxembourg' );
    $data->upgrade( 'key3', 'LUX' );
    $data->upgrade( 'country_number', '442' );
    $data->upgrade( 'flag', 'lu' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'lu',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: lu'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'lu',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: lu'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: lu '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'mo' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'mo';
      }
    $data->upgrade( 'name', 'Macau' );
    $data->upgrade( 'key3', 'MAC' );
    $data->upgrade( 'country_number', '466' );
    $data->upgrade( 'flag', 'mo' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'mo',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: mo'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'mo',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: mo'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: mo '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'mk' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'mk';
      }
    $data->upgrade( 'name', 'Macedonia' );
    $data->upgrade( 'key3', 'MKD' );
    $data->upgrade( 'country_number', '807' );
    $data->upgrade( 'flag', 'mk' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'mk',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: mk'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'mk',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: mk'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: mk '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'mg' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'mg';
      }
    $data->upgrade( 'name', 'Madagascar' );
    $data->upgrade( 'key3', 'MDG' );
    $data->upgrade( 'country_number', '450' );
    $data->upgrade( 'flag', 'mg' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'mg',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: mg'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'mg',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: mg'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: mg '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'mw' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'mw';
      }
    $data->upgrade( 'name', 'Malawi' );
    $data->upgrade( 'key3', 'MWI' );
    $data->upgrade( 'country_number', '454' );
    $data->upgrade( 'flag', 'mw' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'mw',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: mw'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'mw',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: mw'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: mw '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'my' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'my';
      }
    $data->upgrade( 'name', 'Malaysia' );
    $data->upgrade( 'key3', 'MYS' );
    $data->upgrade( 'country_number', '458' );
    $data->upgrade( 'flag', 'my' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'my',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: my'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'my',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: my'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: my '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'mv' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'mv';
      }
    $data->upgrade( 'name', 'Maldives' );
    $data->upgrade( 'key3', 'MDV' );
    $data->upgrade( 'country_number', '462' );
    $data->upgrade( 'flag', 'mv' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'mv',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: mv'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'mv',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: mv'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: mv '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'ml' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'ml';
      }
    $data->upgrade( 'name', 'Mali' );
    $data->upgrade( 'key3', 'MLI' );
    $data->upgrade( 'country_number', '4' );
    $data->upgrade( 'flag', 'ml' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'ml',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: ml'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'ml',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: ml'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: ml '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'mt' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'mt';
      }
    $data->upgrade( 'name', 'Malta' );
    $data->upgrade( 'key3', 'MLT' );
    $data->upgrade( 'country_number', '470' );
    $data->upgrade( 'flag', 'mt' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'mt',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: mt'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'mt',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: mt'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: mt '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'mh' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'mh';
      }
    $data->upgrade( 'name', 'Marshall Islands' );
    $data->upgrade( 'key3', 'MHL' );
    $data->upgrade( 'country_number', '584' );
    $data->upgrade( 'flag', 'mh' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'mh',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: mh'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'mh',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: mh'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: mh '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'mq' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'mq';
      }
    $data->upgrade( 'name', 'Martinique' );
    $data->upgrade( 'key3', 'MTQ' );
    $data->upgrade( 'country_number', '474' );
    $data->upgrade( 'flag', 'mq' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'mq',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: mq'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'mq',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: mq'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: mq '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'mr' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'mr';
      }
    $data->upgrade( 'name', 'Mauritania' );
    $data->upgrade( 'key3', 'MRT' );
    $data->upgrade( 'country_number', '478' );
    $data->upgrade( 'flag', 'mr' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'mr',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: mr'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'mr',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: mr'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: mr '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'mu' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'mu';
      }
    $data->upgrade( 'name', 'Mauritius' );
    $data->upgrade( 'key3', 'MUS' );
    $data->upgrade( 'country_number', '480' );
    $data->upgrade( 'flag', 'mu' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'mu',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: mu'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'mu',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: mu'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: mu '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'yt' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'yt';
      }
    $data->upgrade( 'name', 'Mayotte' );
    $data->upgrade( 'key3', 'MYT' );
    $data->upgrade( 'country_number', '175' );
    $data->upgrade( 'flag', 'yt' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'yt',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: yt'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'yt',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: yt'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: yt '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'mx' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'mx';
      }
    $data->upgrade( 'name', 'Mexico' );
    $data->upgrade( 'key3', 'MEX' );
    $data->upgrade( 'country_number', '484' );
    $data->upgrade( 'flag', 'mx' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'mx',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: mx'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'mx',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: mx'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: mx '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'fm' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'fm';
      }
    $data->upgrade( 'name', 'Feferated States of Micronesia' );
    $data->upgrade( 'key3', 'FSM' );
    $data->upgrade( 'country_number', '583' );
    $data->upgrade( 'flag', 'fm' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'fm',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: fm'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'fm',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: fm'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: fm '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'md' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'md';
      }
    $data->upgrade( 'name', 'Republic of Moldova' );
    $data->upgrade( 'key3', 'MDA' );
    $data->upgrade( 'country_number', '498' );
    $data->upgrade( 'flag', 'md' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'md',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: md'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'md',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: md'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: md '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'mc' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'mc';
      }
    $data->upgrade( 'name', 'Monaco' );
    $data->upgrade( 'key3', 'MCO' );
    $data->upgrade( 'country_number', '492' );
    $data->upgrade( 'flag', 'mc' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'mc',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: mc'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'mc',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: mc'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: mc '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'mn' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'mn';
      }
    $data->upgrade( 'name', 'Mongolia' );
    $data->upgrade( 'key3', 'MNG' );
    $data->upgrade( 'country_number', '496' );
    $data->upgrade( 'flag', 'mn' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'mn',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: mn'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'mn',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: mn'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: mn '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'ms' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'ms';
      }
    $data->upgrade( 'name', 'Montserrat' );
    $data->upgrade( 'key3', 'MSR' );
    $data->upgrade( 'country_number', '500' );
    $data->upgrade( 'flag', 'ms' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'ms',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: ms'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'ms',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: ms'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: ms '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'ma' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'ma';
      }
    $data->upgrade( 'name', 'Morocco' );
    $data->upgrade( 'key3', 'MAR' );
    $data->upgrade( 'country_number', '504' );
    $data->upgrade( 'flag', 'ma' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'ma',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: ma'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'ma',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: ma'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: ma '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'mz' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'mz';
      }
    $data->upgrade( 'name', 'Mozambique' );
    $data->upgrade( 'key3', 'MOZ' );
    $data->upgrade( 'country_number', '508' );
    $data->upgrade( 'flag', 'mz' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'mz',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: mz'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'mz',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: mz'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: mz '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'mm' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'mm';
      }
    $data->upgrade( 'name', 'Myanmar (Burma)' );
    $data->upgrade( 'key3', 'MMR' );
    $data->upgrade( 'country_number', '104' );
    $data->upgrade( 'flag', 'mm' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'mm',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: mm'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'mm',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: mm'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: mm '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'na' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'na';
      }
    $data->upgrade( 'name', 'Namibia' );
    $data->upgrade( 'key3', 'NAM' );
    $data->upgrade( 'country_number', '516' );
    $data->upgrade( 'flag', 'na' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'na',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: na'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'na',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: na'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: na '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'nr' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'nr';
      }
    $data->upgrade( 'name', 'Nauru' );
    $data->upgrade( 'key3', 'NRU' );
    $data->upgrade( 'country_number', '520' );
    $data->upgrade( 'flag', 'nr' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'nr',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: nr'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'nr',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: nr'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: nr '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'np' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'np';
      }
    $data->upgrade( 'name', 'Nepal' );
    $data->upgrade( 'key3', 'NPL' );
    $data->upgrade( 'country_number', '524' );
    $data->upgrade( 'flag', 'np' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'np',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: np'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'np',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: np'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: np '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'nl' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'nl';
      }
    $data->upgrade( 'name', 'Netherlands' );
    $data->upgrade( 'key3', 'NLD' );
    $data->upgrade( 'country_number', '528' );
    $data->upgrade( 'flag', 'nl' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'nl',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: nl'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'nl',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: nl'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: nl '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'an' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'an';
      }
    $data->upgrade( 'name', 'Netherlands Antilles' );
    $data->upgrade( 'key3', 'ANT' );
    $data->upgrade( 'country_number', '530' );
    $data->upgrade( 'flag', 'an' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'an',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: an'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'an',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: an'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: an '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'nc' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'nc';
      }
    $data->upgrade( 'name', 'New Caledonia' );
    $data->upgrade( 'key3', 'NCL' );
    $data->upgrade( 'country_number', '540' );
    $data->upgrade( 'flag', 'nc' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'nc',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: nc'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'nc',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: nc'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: nc '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'nz' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'nz';
      }
    $data->upgrade( 'name', 'New Zealand' );
    $data->upgrade( 'key3', 'NZL' );
    $data->upgrade( 'country_number', '554' );
    $data->upgrade( 'flag', 'nz' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'nz',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: nz'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'nz',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: nz'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: nz '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'ni' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'ni';
      }
    $data->upgrade( 'name', 'Nicaragua' );
    $data->upgrade( 'key3', 'NIC' );
    $data->upgrade( 'country_number', '558' );
    $data->upgrade( 'flag', 'ni' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'ni',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: ni'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'ni',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: ni'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: ni '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'ne' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'ne';
      }
    $data->upgrade( 'name', 'Niger' );
    $data->upgrade( 'key3', 'NER' );
    $data->upgrade( 'country_number', '562' );
    $data->upgrade( 'flag', 'ne' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'ne',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: ne'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'ne',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: ne'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: ne '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'ng' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'ng';
      }
    $data->upgrade( 'name', 'Nigeria' );
    $data->upgrade( 'key3', 'NGA' );
    $data->upgrade( 'country_number', '566' );
    $data->upgrade( 'flag', 'ng' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'ng',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: ng'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'ng',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: ng'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: ng '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'nu' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'nu';
      }
    $data->upgrade( 'name', 'Niue' );
    $data->upgrade( 'key3', 'NIU' );
    $data->upgrade( 'country_number', '570' );
    $data->upgrade( 'flag', 'nu' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'nu',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: nu'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'nu',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: nu'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: nu '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'nf' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'nf';
      }
    $data->upgrade( 'name', 'Norfolk Island' );
    $data->upgrade( 'key3', 'NFK' );
    $data->upgrade( 'country_number', '574' );
    $data->upgrade( 'flag', 'nf' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'nf',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: nf'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'nf',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: nf'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: nf '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'mp' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'mp';
      }
    $data->upgrade( 'name', 'Nothern Mariana Islands' );
    $data->upgrade( 'key3', 'MNP' );
    $data->upgrade( 'country_number', '580' );
    $data->upgrade( 'flag', 'mp' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'mp',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: mp'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'mp',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: mp'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: mp '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'no' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'no';
      }
    $data->upgrade( 'name', 'Norway' );
    $data->upgrade( 'key3', 'NOR' );
    $data->upgrade( 'country_number', '578' );
    $data->upgrade( 'flag', 'no' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'no',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: no'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'no',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: no'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: no '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'om' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'om';
      }
    $data->upgrade( 'name', 'Oman' );
    $data->upgrade( 'key3', 'OMN' );
    $data->upgrade( 'country_number', '512' );
    $data->upgrade( 'flag', 'om' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'om',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: om'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'om',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: om'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: om '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'pk' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'pk';
      }
    $data->upgrade( 'name', 'Pakistan' );
    $data->upgrade( 'key3', 'PAK' );
    $data->upgrade( 'country_number', '586' );
    $data->upgrade( 'flag', 'pk' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'pk',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: pk'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'pk',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: pk'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: pk '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'pw' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'pw';
      }
    $data->upgrade( 'name', 'Palau' );
    $data->upgrade( 'key3', 'PLW' );
    $data->upgrade( 'country_number', '585' );
    $data->upgrade( 'flag', 'pw' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'pw',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: pw'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'pw',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: pw'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: pw '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'pa' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'pa';
      }
    $data->upgrade( 'name', 'Panama' );
    $data->upgrade( 'key3', 'PAN' );
    $data->upgrade( 'country_number', '591' );
    $data->upgrade( 'flag', 'pa' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'pa',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: pa'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'pa',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: pa'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: pa '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'pg' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'pg';
      }
    $data->upgrade( 'name', 'Papua New Guinea' );
    $data->upgrade( 'key3', 'PNG' );
    $data->upgrade( 'country_number', '598' );
    $data->upgrade( 'flag', 'pg' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'pg',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: pg'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'pg',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: pg'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: pg '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'py' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'py';
      }
    $data->upgrade( 'name', 'Paraguay' );
    $data->upgrade( 'key3', 'PRY' );
    $data->upgrade( 'country_number', '600' );
    $data->upgrade( 'flag', 'py' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'py',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: py'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'py',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: py'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: py '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'pe' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'pe';
      }
    $data->upgrade( 'name', 'Peru' );
    $data->upgrade( 'key3', 'PER' );
    $data->upgrade( 'country_number', '604' );
    $data->upgrade( 'flag', 'pe' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'pe',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: pe'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'pe',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: pe'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: pe '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'ph' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'ph';
      }
    $data->upgrade( 'name', 'Phillipines' );
    $data->upgrade( 'key3', 'PHL' );
    $data->upgrade( 'country_number', '608' );
    $data->upgrade( 'flag', 'ph' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'ph',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: ph'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'ph',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: ph'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: ph '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'pn' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'pn';
      }
    $data->upgrade( 'name', 'Pitcairn' );
    $data->upgrade( 'key3', 'PCN' );
    $data->upgrade( 'country_number', '612' );
    $data->upgrade( 'flag', 'pn' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'pn',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: pn'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'pn',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: pn'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: pn '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'pl' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'pl';
      }
    $data->upgrade( 'name', 'Poland' );
    $data->upgrade( 'key3', 'POL' );
    $data->upgrade( 'country_number', '616' );
    $data->upgrade( 'flag', 'pl' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'pl',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: pl'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'pl',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: pl'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: pl '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'pt' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'pt';
      }
    $data->upgrade( 'name', 'Portugal' );
    $data->upgrade( 'key3', 'PRT' );
    $data->upgrade( 'country_number', '620' );
    $data->upgrade( 'flag', '' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'pt',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: pt'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'pt',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: pt'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: pt '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'pr' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'pr';
      }
    $data->upgrade( 'name', 'Puerto Rico' );
    $data->upgrade( 'key3', 'PRI' );
    $data->upgrade( 'country_number', '630' );
    $data->upgrade( 'flag', 'pr' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'pr',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: pr'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'pr',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: pr'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: pr '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'qa' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'qa';
      }
    $data->upgrade( 'name', 'Qatar' );
    $data->upgrade( 'key3', 'QAT' );
    $data->upgrade( 'country_number', '634' );
    $data->upgrade( 'flag', 'qa' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'qa',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: qa'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'qa',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: qa'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: qa '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 're' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 're';
      }
    $data->upgrade( 'name', 'Reunion' );
    $data->upgrade( 'key3', 'REU' );
    $data->upgrade( 'country_number', '638' );
    $data->upgrade( 'flag', 're' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          're',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: re'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            're',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: re'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: re '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'ro' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'ro';
      }
    $data->upgrade( 'name', 'Romania' );
    $data->upgrade( 'key3', 'ROM' );
    $data->upgrade( 'country_number', '642' );
    $data->upgrade( 'flag', 'ro' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'ro',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: ro'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'ro',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: ro'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: ro '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'ru' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'ru';
      }
    $data->upgrade( 'name', 'Russian Federation' );
    $data->upgrade( 'key3', 'RUS' );
    $data->upgrade( 'country_number', '643' );
    $data->upgrade( 'flag', 'ru' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'ru',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: ru'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'ru',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: ru'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: ru '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'rw' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'rw';
      }
    $data->upgrade( 'name', 'Rwanda' );
    $data->upgrade( 'key3', 'RWA' );
    $data->upgrade( 'country_number', '646' );
    $data->upgrade( 'flag', 'rw' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'rw',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: rw'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'rw',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: rw'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: rw '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'kn' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'kn';
      }
    $data->upgrade( 'name', 'Saint Kitts and Nevis' );
    $data->upgrade( 'key3', 'KNA' );
    $data->upgrade( 'country_number', '659' );
    $data->upgrade( 'flag', 'kn' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'kn',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: kn'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'kn',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: kn'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: kn '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'lc' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'lc';
      }
    $data->upgrade( 'name', 'Saint Lucia' );
    $data->upgrade( 'key3', 'LCA' );
    $data->upgrade( 'country_number', '662' );
    $data->upgrade( 'flag', 'lc' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'lc',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: lc'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'lc',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: lc'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: lc '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'vc' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'vc';
      }
    $data->upgrade( 'name', 'Saint Vincent and the Grenadines' );
    $data->upgrade( 'key3', 'VCT' );
    $data->upgrade( 'country_number', '670' );
    $data->upgrade( 'flag', 'vc' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'vc',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: vc'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'vc',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: vc'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: vc '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'ws' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'ws';
      }
    $data->upgrade( 'name', 'Samoa' );
    $data->upgrade( 'key3', 'WSM' );
    $data->upgrade( 'country_number', '882' );
    $data->upgrade( 'flag', 'ws' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'ws',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: ws'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'ws',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: ws'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: ws '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'sm' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'sm';
      }
    $data->upgrade( 'name', 'San Marino' );
    $data->upgrade( 'key3', 'SMR' );
    $data->upgrade( 'country_number', '674' );
    $data->upgrade( 'flag', 'sm' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'sm',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: sm'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'sm',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: sm'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: sm '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'st' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'st';
      }
    $data->upgrade( 'name', 'Sao Tome and Principe' );
    $data->upgrade( 'key3', 'STP' );
    $data->upgrade( 'country_number', '678' );
    $data->upgrade( 'flag', 'st' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'st',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: st'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'st',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: st'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: st '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'sa' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'sa';
      }
    $data->upgrade( 'name', 'Saudi Arabia' );
    $data->upgrade( 'key3', 'SAU' );
    $data->upgrade( 'country_number', '682' );
    $data->upgrade( 'flag', 'sa' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'sa',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: sa'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'sa',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: sa'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: sa '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'sn' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'sn';
      }
    $data->upgrade( 'name', 'Senegal' );
    $data->upgrade( 'key3', 'SEN' );
    $data->upgrade( 'country_number', '686' );
    $data->upgrade( 'flag', 'sn' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'sn',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: sn'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'sn',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: sn'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: sn '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'sc' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'sc';
      }
    $data->upgrade( 'name', 'Seychelles' );
    $data->upgrade( 'key3', 'SYC' );
    $data->upgrade( 'country_number', '690' );
    $data->upgrade( 'flag', 'sc' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'sc',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: sc'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'sc',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: sc'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: sc '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'sl' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'sl';
      }
    $data->upgrade( 'name', 'Sierra Leone' );
    $data->upgrade( 'key3', 'SLE' );
    $data->upgrade( 'country_number', '694' );
    $data->upgrade( 'flag', 'sl' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'sl',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: sl'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'sl',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: sl'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: sl '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'sg' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'sg';
      }
    $data->upgrade( 'name', 'Singapore' );
    $data->upgrade( 'key3', 'SGP' );
    $data->upgrade( 'country_number', '702' );
    $data->upgrade( 'flag', 'sg' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'sg',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: sg'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'sg',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: sg'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: sg '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'sk' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'sk';
      }
    $data->upgrade( 'name', 'Slovakia' );
    $data->upgrade( 'key3', 'SVK' );
    $data->upgrade( 'country_number', '703' );
    $data->upgrade( 'flag', 'sk' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'sk',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: sk'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'sk',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: sk'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: sk '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'si' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'si';
      }
    $data->upgrade( 'name', 'Slovenia' );
    $data->upgrade( 'key3', 'SVN' );
    $data->upgrade( 'country_number', '705' );
    $data->upgrade( 'flag', 'si' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'si',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: si'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'si',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: si'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: si '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'sb' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'sb';
      }
    $data->upgrade( 'name', 'Solomon Islands' );
    $data->upgrade( 'key3', 'SLB' );
    $data->upgrade( 'country_number', '090' );
    $data->upgrade( 'flag', 'sb' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'sb',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: sb'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'sb',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: sb'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: sb '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'so' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'so';
      }
    $data->upgrade( 'name', 'Somalia' );
    $data->upgrade( 'key3', 'SOM' );
    $data->upgrade( 'country_number', '706' );
    $data->upgrade( 'flag', 'so' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'so',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: so'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'so',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: so'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: so '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'za' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'za';
      }
    $data->upgrade( 'name', 'South Africa' );
    $data->upgrade( 'key3', 'ZAF' );
    $data->upgrade( 'country_number', '710' );
    $data->upgrade( 'flag', 'za' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'za',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: za'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'za',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: za'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: za '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'gs' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'gs';
      }
    $data->upgrade( 'name', 'South Georgia and South S.S.' );
    $data->upgrade( 'key3', 'SGS' );
    $data->upgrade( 'country_number', '239' );
    $data->upgrade( 'flag', 'gs' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'gs',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: gs'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'gs',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: gs'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: gs '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'es' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'es';
      }
    $data->upgrade( 'name', 'Spain' );
    $data->upgrade( 'key3', 'ESP' );
    $data->upgrade( 'country_number', '724' );
    $data->upgrade( 'flag', 'es' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'es',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: es'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'es',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: es'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: es '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'lk' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'lk';
      }
    $data->upgrade( 'name', 'Sri Lanka' );
    $data->upgrade( 'key3', 'LKA' );
    $data->upgrade( 'country_number', '144' );
    $data->upgrade( 'flag', 'lk' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'lk',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: lk'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'lk',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: lk'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: lk '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'sh' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'sh';
      }
    $data->upgrade( 'name', 'St. Helena' );
    $data->upgrade( 'key3', 'SHN' );
    $data->upgrade( 'country_number', '654' );
    $data->upgrade( 'flag', 'sh' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'sh',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: sh'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'sh',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: sh'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: sh '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'pm' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'pm';
      }
    $data->upgrade( 'name', 'St. Pierre and Miquelon' );
    $data->upgrade( 'key3', 'SPM' );
    $data->upgrade( 'country_number', '666' );
    $data->upgrade( 'flag', 'pm' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'pm',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: pm'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'pm',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: pm'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: pm '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'sd' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'sd';
      }
    $data->upgrade( 'name', 'Sudan' );
    $data->upgrade( 'key3', 'SDN' );
    $data->upgrade( 'country_number', '736' );
    $data->upgrade( 'flag', 'sd' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'sd',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: sd'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'sd',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: sd'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: sd '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'sr' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'sr';
      }
    $data->upgrade( 'name', 'Suriname' );
    $data->upgrade( 'key3', 'SUR' );
    $data->upgrade( 'country_number', '740' );
    $data->upgrade( 'flag', 'sr' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'sr',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: sr'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'sr',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: sr'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: sr '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'sj' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'sj';
      }
    $data->upgrade( 'name', 'Svalbard and Jan Mayen Islands' );
    $data->upgrade( 'key3', 'SJM' );
    $data->upgrade( 'country_number', '744' );
    $data->upgrade( 'flag', 'sj' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'sj',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: sj'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'sj',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: sj'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: sj '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'sz' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'sz';
      }
    $data->upgrade( 'name', 'Swaziland' );
    $data->upgrade( 'key3', 'SWZ' );
    $data->upgrade( 'country_number', '748' );
    $data->upgrade( 'flag', 'sz' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'sz',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: sz'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'sz',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: sz'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: sz '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'se' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'se';
      }
    $data->upgrade( 'name', 'Sweden' );
    $data->upgrade( 'key3', 'SWE' );
    $data->upgrade( 'country_number', '752' );
    $data->upgrade( 'flag', 'se' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'se',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: se'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'se',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: se'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: se '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'ch' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'ch';
      }
    $data->upgrade( 'name', 'Switzerland' );
    $data->upgrade( 'key3', 'CHE' );
    $data->upgrade( 'country_number', '756' );
    $data->upgrade( 'flag', 'ch' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'ch',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: ch'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'ch',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: ch'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: ch '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'sy' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'sy';
      }
    $data->upgrade( 'name', 'Syrian Arab Republic' );
    $data->upgrade( 'key3', 'SYR' );
    $data->upgrade( 'country_number', '760' );
    $data->upgrade( 'flag', 'sy' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'sy',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: sy'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'sy',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: sy'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: sy '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'tw' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'tw';
      }
    $data->upgrade( 'name', 'Taiwan, Province of China' );
    $data->upgrade( 'key3', 'TWN' );
    $data->upgrade( 'country_number', '158' );
    $data->upgrade( 'flag', 'tw' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'tw',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: tw'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'tw',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: tw'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: tw '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'tj' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'tj';
      }
    $data->upgrade( 'name', 'Tajikistan' );
    $data->upgrade( 'key3', 'TJK' );
    $data->upgrade( 'country_number', '762' );
    $data->upgrade( 'flag', 'tj' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'tj',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: tj'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'tj',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: tj'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: tj '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'tz' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'tz';
      }
    $data->upgrade( 'name', 'United Republic of Tanzania' );
    $data->upgrade( 'key3', 'TZA' );
    $data->upgrade( 'country_number', '834' );
    $data->upgrade( 'flag', 'tz' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'tz',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: tz'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'tz',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: tz'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: tz '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'th' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'th';
      }
    $data->upgrade( 'name', 'Thailand' );
    $data->upgrade( 'key3', 'THA' );
    $data->upgrade( 'country_number', '764' );
    $data->upgrade( 'flag', 'th' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'th',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: th'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'th',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: th'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: th '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'tg' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'tg';
      }
    $data->upgrade( 'name', 'Togo' );
    $data->upgrade( 'key3', 'TGO' );
    $data->upgrade( 'country_number', '768' );
    $data->upgrade( 'flag', 'tg' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'tg',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: tg'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'tg',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: tg'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: tg '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'tk' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'tk';
      }
    $data->upgrade( 'name', 'Tokelau' );
    $data->upgrade( 'key3', 'TKL' );
    $data->upgrade( 'country_number', '772' );
    $data->upgrade( 'flag', 'tk' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'tk',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: tk'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'tk',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: tk'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: tk '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'to' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'to';
      }
    $data->upgrade( 'name', 'Tonga' );
    $data->upgrade( 'key3', 'TON' );
    $data->upgrade( 'country_number', '776' );
    $data->upgrade( 'flag', 'to' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'to',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: to'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'to',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: to'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: to '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'tt' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'tt';
      }
    $data->upgrade( 'name', 'Trinidad and Tobago' );
    $data->upgrade( 'key3', 'TTO' );
    $data->upgrade( 'country_number', '780' );
    $data->upgrade( 'flag', 'tt' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'tt',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: tt'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'tt',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: tt'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: tt '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'tn' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'tn';
      }
    $data->upgrade( 'name', 'Tunisia' );
    $data->upgrade( 'key3', 'TUN' );
    $data->upgrade( 'country_number', '788' );
    $data->upgrade( 'flag', 'tn' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'tn',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: tn'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'tn',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: tn'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: tn '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'tr' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'tr';
      }
    $data->upgrade( 'name', 'Turkey' );
    $data->upgrade( 'key3', 'TUR' );
    $data->upgrade( 'country_number', '792' );
    $data->upgrade( 'flag', 'tr' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'tr',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: tr'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'tr',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: tr'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: tr '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'tm' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'tm';
      }
    $data->upgrade( 'name', 'Turkmenistan' );
    $data->upgrade( 'key3', 'TKM' );
    $data->upgrade( 'country_number', '795' );
    $data->upgrade( 'flag', 'tm' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'tm',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: tm'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'tm',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: tm'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: tm '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'tc' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'tc';
      }
    $data->upgrade( 'name', 'Turks and Caicos Islands' );
    $data->upgrade( 'key3', 'TCA' );
    $data->upgrade( 'country_number', '796' );
    $data->upgrade( 'flag', 'tc' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'tc',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: tc'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'tc',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: tc'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: tc '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'tv' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'tv';
      }
    $data->upgrade( 'name', 'Tuvalu' );
    $data->upgrade( 'key3', 'TUV' );
    $data->upgrade( 'country_number', '798' );
    $data->upgrade( 'flag', 'tv' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'tv',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: tv'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'tv',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: tv'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: tv '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'ug' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'ug';
      }
    $data->upgrade( 'name', 'Uganda' );
    $data->upgrade( 'key3', 'UGA' );
    $data->upgrade( 'country_number', '800' );
    $data->upgrade( 'flag', 'ug' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'ug',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: ug'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'ug',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: ug'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: ug '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'ua' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'ua';
      }
    $data->upgrade( 'name', 'Ukraine' );
    $data->upgrade( 'key3', 'UKR' );
    $data->upgrade( 'country_number', '804' );
    $data->upgrade( 'flag', 'ua' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'ua',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: ua'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'ua',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: ua'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: ua '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'ae' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'ae';
      }
    $data->upgrade( 'name', 'United Arab Emirates' );
    $data->upgrade( 'key3', 'ARE' );
    $data->upgrade( 'country_number', '784' );
    $data->upgrade( 'flag', 'ae' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'ae',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: ae'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'ae',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: ae'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: ae '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'gb' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'gb';
      }
    $data->upgrade( 'name', 'United Kingdom' );
    $data->upgrade( 'key3', 'GBR' );
    $data->upgrade( 'country_number', '826' );
    $data->upgrade( 'flag', 'gb' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'gb',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: gb'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'gb',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: gb'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: gb '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'us' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'us';
      }
    $data->upgrade( 'name', 'United States' );
    $data->upgrade( 'key3', 'USA' );
    $data->upgrade( 'country_number', '840' );
    $data->upgrade( 'flag', 'us' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'us',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: us'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'us',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: us'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: us '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'um' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'um';
      }
    $data->upgrade( 'name', 'U.S. Minor Islands' );
    $data->upgrade( 'key3', 'UMI' );
    $data->upgrade( 'country_number', '581' );
    $data->upgrade( 'flag', 'um' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'um',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: um'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'um',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: um'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: um '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'uy' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'uy';
      }
    $data->upgrade( 'name', 'Uruguay' );
    $data->upgrade( 'key3', 'URY' );
    $data->upgrade( 'country_number', '858' );
    $data->upgrade( 'flag', 'uy' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'uy',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: uy'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'uy',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: uy'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: uy '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'uz' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'uz';
      }
    $data->upgrade( 'name', 'Uzbekistan' );
    $data->upgrade( 'key3', 'UZB' );
    $data->upgrade( 'country_number', '860' );
    $data->upgrade( 'flag', 'uz' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'uz',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: uz'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'uz',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: uz'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: uz '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'vu' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'vu';
      }
    $data->upgrade( 'name', 'Vanuatu' );
    $data->upgrade( 'key3', 'VUT' );
    $data->upgrade( 'country_number', '548' );
    $data->upgrade( 'flag', 'vu' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'vu',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: vu'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'vu',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: vu'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: vu '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 've' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 've';
      }
    $data->upgrade( 'name', 'Venezuela' );
    $data->upgrade( 'key3', 'VEN' );
    $data->upgrade( 'country_number', '862' );
    $data->upgrade( 'flag', 've' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          've',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: ve'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            've',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: ve'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: ve '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'vn' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'vn';
      }
    $data->upgrade( 'name', 'Vietnam' );
    $data->upgrade( 'key3', 'VNM' );
    $data->upgrade( 'country_number', '704' );
    $data->upgrade( 'flag', 'vn' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'vn',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: vn'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'vn',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: vn'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: vn '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'vg' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'vg';
      }
    $data->upgrade( 'name', 'Virgin Islands (British)' );
    $data->upgrade( 'key3', 'VGB' );
    $data->upgrade( 'country_number', '092' );
    $data->upgrade( 'flag', 'vg' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'vg',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: vg'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'vg',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: vg'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: vg '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'vi' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'vi';
      }
    $data->upgrade( 'name', 'Virgin Islands (U.S.)' );
    $data->upgrade( 'key3', 'VIR' );
    $data->upgrade( 'country_number', '850' );
    $data->upgrade( 'flag', '' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'vi',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: vi'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'vi',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: vi'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: vi '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'wf' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'wf';
      }
    $data->upgrade( 'name', 'Wallis and Futuna Islands' );
    $data->upgrade( 'key3', 'WLF' );
    $data->upgrade( 'country_number', '876' );
    $data->upgrade( 'flag', 'wf' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'wf',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: wf'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'wf',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: wf'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: wf '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'eh' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'eh';
      }
    $data->upgrade( 'name', 'Western Sahara' );
    $data->upgrade( 'key3', 'ESH' );
    $data->upgrade( 'country_number', '732' );
    $data->upgrade( 'flag', 'eh' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'eh',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: eh'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'eh',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: eh'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: eh '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'ye' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'ye';
      }
    $data->upgrade( 'name', 'Yemen' );
    $data->upgrade( 'key3', 'YEM' );
    $data->upgrade( 'country_number', '887' );
    $data->upgrade( 'flag', 'ye' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'ye',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: ye'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'ye',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: ye'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: ye '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'zm' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'zm';
      }
    $data->upgrade( 'name', 'Zambia' );
    $data->upgrade( 'key3', 'ZMB' );
    $data->upgrade( 'country_number', '894' );
    $data->upgrade( 'flag', 'zm' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'zm',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: zm'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'zm',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: zm'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: zm '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'CoreCountry', 'zw' ) )
      {
        $data = new CoreCountry_Entity();
        $data->access_key  = 'zw';
      }
    $data->upgrade( 'name', 'Zimbabwe' );
    $data->upgrade( 'key3', 'ZWE' );
    $data->upgrade( 'country_number', '716' );
    $data->upgrade( 'flag', 'zw' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'zw',
          'CoreCountry',
          'Sucessfully created new CoreCountry dataset key: zw'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'zw',
            'CoreCountry',
            'Sucessfully updated CoreCountry dataset key: zw'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'core_country',
        'CoreCountry',
        'Failed to sync CoreCountry dataset key: zw '.$e->getMessage()
      ));
    }
