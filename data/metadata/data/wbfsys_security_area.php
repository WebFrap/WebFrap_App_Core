<?php 

      if( !$data = $orm->getByKey( 'WbfsysSecurityArea', 'root' ) )
      {
        $data = new WbfsysSecurityArea_Entity();
        $data->access_key  = 'root';
      }
    $data->upgrade( 'label', 'Root' );
    $data->upgrade( 'description', 'The Root Security Area' );
    $data->upgrade( 'type_key', 'root' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'root',
          'WbfsysSecurityArea',
          'Sucessfully created new WbfsysSecurityArea dataset key: root'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'root',
            'WbfsysSecurityArea',
            'Sucessfully updated WbfsysSecurityArea dataset key: root'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_security_area',
        'WbfsysSecurityArea',
        'Failed to sync WbfsysSecurityArea dataset key: root '.$e->getMessage()
      ));
    }
