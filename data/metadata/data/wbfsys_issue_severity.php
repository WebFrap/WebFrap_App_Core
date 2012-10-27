<?php 

      if( !$data = $orm->getByKey( 'WbfsysIssueSeverity', 'minor' ) )
      {
        $data = new WbfsysIssueSeverity_Entity();
        $data->access_key  = 'minor';
      }
    $data->upgrade( 'name', 'Minor' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'minor',
          'WbfsysIssueSeverity',
          'Sucessfully created new WbfsysIssueSeverity dataset key: minor'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'minor',
            'WbfsysIssueSeverity',
            'Sucessfully updated WbfsysIssueSeverity dataset key: minor'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_issue_severity',
        'WbfsysIssueSeverity',
        'Failed to sync WbfsysIssueSeverity dataset key: minor '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'WbfsysIssueSeverity', 'medium' ) )
      {
        $data = new WbfsysIssueSeverity_Entity();
        $data->access_key  = 'medium';
      }
    $data->upgrade( 'name', 'Medium' );
    $data->upgrade( 'description', 'Medium Severity' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'medium',
          'WbfsysIssueSeverity',
          'Sucessfully created new WbfsysIssueSeverity dataset key: medium'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'medium',
            'WbfsysIssueSeverity',
            'Sucessfully updated WbfsysIssueSeverity dataset key: medium'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_issue_severity',
        'WbfsysIssueSeverity',
        'Failed to sync WbfsysIssueSeverity dataset key: medium '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'WbfsysIssueSeverity', 'high' ) )
      {
        $data = new WbfsysIssueSeverity_Entity();
        $data->access_key  = 'high';
      }
    $data->upgrade( 'name', 'High' );
    $data->upgrade( 'description', '' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'high',
          'WbfsysIssueSeverity',
          'Sucessfully created new WbfsysIssueSeverity dataset key: high'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'high',
            'WbfsysIssueSeverity',
            'Sucessfully updated WbfsysIssueSeverity dataset key: high'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_issue_severity',
        'WbfsysIssueSeverity',
        'Failed to sync WbfsysIssueSeverity dataset key: high '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'WbfsysIssueSeverity', 'blocking' ) )
      {
        $data = new WbfsysIssueSeverity_Entity();
        $data->access_key  = 'blocking';
      }
    $data->upgrade( 'name', 'Blocking' );
    $data->upgrade( 'description', '' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'blocking',
          'WbfsysIssueSeverity',
          'Sucessfully created new WbfsysIssueSeverity dataset key: blocking'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'blocking',
            'WbfsysIssueSeverity',
            'Sucessfully updated WbfsysIssueSeverity dataset key: blocking'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_issue_severity',
        'WbfsysIssueSeverity',
        'Failed to sync WbfsysIssueSeverity dataset key: blocking '.$e->getMessage()
      ));
    }
